<?php 
class Item extends Model
{
    public string $table = "items";
    public array $columns = ['id', 'name', 'price'];
}
