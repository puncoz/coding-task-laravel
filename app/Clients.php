<?php

namespace CodingTask;

class Clients
{
    private $clients = [];
    private $csvFile;

    function __construct($csvFile)
    {
        $this->csvFile = $csvFile;
        $clients = $this->read($csvFile);
        $this->clients = $clients===false ? [] : $clients;
    }

    public function all($value='')
    {
        return $this->clients;
    }
    public function find($id)
    {
        return isset($this->clients[$id]) ? $this->clients[$id] : false;
    }
    public function add($data)
    {
        return $this->write($this->csvFile, $data);
    }

    private function read($csvFile)
    {
        if (!file_exists($csvFile)) {
            return false;
        }

        $fp = fopen($csvFile, 'r');
        if ($fp === false) {
            return false;
        }

        $data = [];
        while (($d = fgetcsv($fp)) !== false) {
            $data[] = $d;
        }
        fclose($fp);

        return empty($data) ? false : $data;
    }
    private function write($csvFile, $data)
    {
        if (empty($data)) {
            return false;
        }

        $fp = fopen($csvFile, 'a');
        if ($fp === false) {
            return false;
        }

        fputcsv($fp, $data);
        fclose($fp);

        return true;
    }
}
