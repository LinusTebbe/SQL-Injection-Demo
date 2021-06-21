<?php

declare(strict_types=1);

namespace SqlInjectionDemo\Service;


class TableRenderingService
{
    public function renderTable(array $data): string
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
}