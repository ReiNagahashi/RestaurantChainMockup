<?php 
namespace Interfaces;

interface FileConvertible {
    public function toString(): string;

    public function toHTML();

    public function toMarkdown();

    public function toArray();
}
