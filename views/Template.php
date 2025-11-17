<?php

class Template
{
    var $filename = '';
    var $content = '';

    function __construct($filename = '')
    {
        $this->filename = $filename;

        // Load file HTML
        $this->content = implode('', @file($filename));
    }

    // Hapus placeholder yang tidak terisi (format DATA_XXXX)
    function clear()
    {
        $this->content = preg_replace("/DATA_[A-Z0-9_]+/", "", $this->content);
    }

    // Tampilkan template
    function write()
    {
        $this->clear();
        print $this->content;
    }

    // Mengembalikan isi template setelah clear
    function getContent()
    {
        $this->clear();
        return $this->content;
    }

    // Replace placeholder => value
    function replace($old = '', $new = '')
    {
        // Format otomatis sesuai tipenya
        if (is_int($new)) {
            $value = sprintf("%d", $new);
        } elseif (is_float($new)) {
            $value = sprintf("%f", $new);
        } elseif (is_array($new)) {
            $value = '';
            foreach ($new as $item) {
                $value .= $item . ' ';
            }
        } else {
            $value = $new;
        }

        // Replace semua kemunculan
        $this->content = preg_replace("/$old/", $value, $this->content);
    }
}