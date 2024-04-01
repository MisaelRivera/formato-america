<?php

namespace App\Helpers;

use FPDF;

class PdfHelper
{
    protected $pdf;

    public function __construct ($orientation, $unit, $size) {
        $this->pdf = new FPDF();
    }

    public function addPage ()
    {
        $this->pdf->addPage();
    }

    public function setFillColor ($r, $g, $b)
    {
        $this->pdf->SetFillColor($r, $g, $b);
    }

    public function setTextColor ($r, $g, $b)
    {
        $this->pdf->SetTextColor($r, $g, $b);
    }

    public function setDrawColor ($r, $g, $b)
    {
        $this->pdf->SetDrawColor($r, $g, $b);
    }

    public function setFont ($faimly, $style, $fontSize)
    {
        $this->pdf->SetFont($faimly, $style, $fontSize);
    }

    public function setX ($x)
    {
        $this->pdf->SetX($x);
    }

    public function setY ($y)
    {
        $this->pdf->SetY($y);
    }

    public function setXY ($x, $y)
    {
        $this->pdf->SetXY($x, $y);
    }

    public function getX ()
    {
        return $this->pdf->GetX();
    }

    public function getY ()
    {
        return $this->pdf->GetY();
    }
}