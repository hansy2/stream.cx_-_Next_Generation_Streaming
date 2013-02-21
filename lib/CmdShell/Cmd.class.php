<?php
/**
 * Cmd Class
 *
 * Description: I've written a class to help make shell scripting in PHP much nicer. Here's the list of features that
 * were important enough to me to bother including in the class:
 * + Return Code Checking
 * + Parameter Escaping
 * + Streamed Output
 * + Exceptions
 * + Object Oriented
 * + Fluent Interface
 *
 * @author Jonathan Dart <info@metricmarketing.ca>
 * @link http://metricmarketing.ca/blog/a-class-to-take-php-shell-scripting-to-the-next-level
 */

class Shell
{
    protected
        $valid_returns = array(0),
        $params = array(),
        $capture_output = false,
        $output,
        $return_val,
        $raw_cmd,
        $escaped_cmd;

    public static function create()
    {
        return new Cmd;
    }

    public function setCmd($cmd)
    {
        $this->raw_cmd = $cmd;
        return $this;
    }

    public function setParams($params)
    {
        if (is_array($params))
            $this->params = $params;
        else
            $this->params = func_get_args();

        return $this;
    }

    public function setCaptureOutput()
    {
        $this->capture_output = true;
        return $this;
    }

    protected function getValidReturns()
    {
        return $valid_returns;
    }

    public function addValidReturn($val)
    {
        $this->valid_returns[] = $val;
        return $this;
    }

    public function setValidReturns($returns)
    {
        if (is_array($returns)) {
            $this->valid_returns = $returns;
        } else {
            $this->valid_returns = array($returns);
        }
        return $this;
    }

    public function exec()
    {
        if (empty($this->raw_cmd)) {
            throw new Exception('no command set');
        }

        $this->output = array();

        $this->makeEscapedCmd();

        $ph = popen($this->escaped_cmd, 'r');

        while(!feof($ph))
        {
            $line = trim(fgets($ph));

            if ($this->capture_output) {
                $this->output[] = $line;
            } else {
                echo $line, "\n";
                flush();
            }
        }

        $this->return_val = pclose($ph);

        if (
            !in_array('*', $this->valid_returns)
            && !in_array($this->return_val, $this->valid_returns)
        ) {
            throw new Exception(sprintf('invalid return code: %d', $this->return_val));
        }

        return $this;
    }

    public function makeEscapedCmd()
    {
        if (!empty($this->params)) {
            $sprintf_params = array();
            foreach ($this->params as &$param) {
                $sprintf_params[] = self::escape($param);
            }
            array_unshift($sprintf_params, $this->raw_cmd);
            $this->escaped_cmd = call_user_func_array('sprintf', $sprintf_params);
        } else {
            $this->escaped_cmd = $this->raw_cmd;
        }
    }

    public static function escape($string)
    {
        return escapeshellarg($string);
    }

    public function getLastCmd()
    {
        return $this->escaped_cmd;
    }

    public function getOutputLines()
    {
        return $this->output;
    }

    public function getOutput()
    {
        $output = implode("\n", $this->output);

        $output = rtrim($output, "\n");

        if (!empty($output))
            return $output . "\n";

        return $output;
    }
}