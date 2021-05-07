<?php
interface CrudInterface{
    function get();
    function update($values);
    function delete($id);
    function add($values);
}