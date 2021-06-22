<?php

declare(strict_types=1);

namespace SqlInjectionDemo\Service;

class ResultRenderingService
{
    public function renderTableResult(?array $data): string
    {
        $result = '';

        if (!is_array($data)) {
            return $result;
        }

        if (count($data) === 0) {
            $result .= "<tr><td><i>Keine Daten gefunden</i></td></tr>";
        }
        foreach ($data as $row) {
            $result .= "<tr>";
            foreach ($row as $column) {
                $result .= "<td>&nbsp;" . $column . "&nbsp;</td>";
            }
            $result .= "</tr>";
        }
        return $result;
    }

    public function renderLoginResult(?string $data): string
    {
        if ($data === null) {
            return '';
        }

        return $data
            ? sprintf(
                '<i class="success">Eingeloggt als "%s".</i>',
                $data
            )
            : "<i>Login fehlgeschlagen</i>";
    }
}