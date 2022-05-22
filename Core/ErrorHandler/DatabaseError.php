<?php
/**
 * This file is part of FacturaScripts
 * Copyright (C) 2017-2022 Carlos Garcia Gomez <carlos@facturascripts.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace FacturaScripts\Core\ErrorHandler;

use Exception;
use FacturaScripts\Core\Template\ErrorHandler;

class DatabaseError extends ErrorHandler
{
    public function exception(Exception $exception): void
    {
        ob_clean();
        http_response_code(self::HTTP_CODE);

        if (str_starts_with($this->url, '/api/')) {
            echo json_encode(['error' => $exception->getMessage()]);
            return;
        }

        echo '<h1>DATABASE ERROR</h1>' . $exception->getMessage();
    }
}