<?php
/**
 * 2.- Se tiene la interfaz IFabricable que permite indicar el proceso de fabricación y como se recicla.
 * Esta interfaz establece los métodos:
 * - metodoFabricacion: Devuelve los pasos para fabricar el elemento
 * - metodoReciclado: Devuelve el método de reciclado que se debe aplicar al elemento según
 * su fabricación.
 */
interface IFabricable {
    public function metodoFabricacion($pasos);
    public function metodoReciclado();
}