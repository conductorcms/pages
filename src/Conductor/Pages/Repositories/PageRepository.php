<?php namespace Conductor\Pages\Repositories;

interface PageRepository {

    public function getAll();

    public function getTypes();

    public function findBySlug($slug);

    public function create($input);

    public function createType($input);

}