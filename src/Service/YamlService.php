<?php
// src/Service/YamlService.php
namespace App\Service;

use Symfony\Component\Yaml\Yaml;

class YamlService
{
    private $projectDir;

    public function __construct(string $projectDir)
    {
        $this->projectDir = $projectDir;
    }

    public function readYamlFile(string $filePath): array
    {
        $fullPath = $this->projectDir . '/config/yaml_data/' . $filePath;
        if (!file_exists($fullPath)) {
            throw new \InvalidArgumentException(sprintf('The file "%s" does not exist.', $fullPath));
        }

        return Yaml::parseFile($fullPath);
    }
}