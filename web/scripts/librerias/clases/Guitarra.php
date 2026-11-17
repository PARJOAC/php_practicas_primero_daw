<?php
class Guitarra extends InstrumentoBase
{
    public function sonido(): string
    {
        return "STRUMMM";
    }

    public function afinar(): string
    {
        return "GIRAR CLAVIJAS";
    }
}
