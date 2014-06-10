<?php
/**
 * This file is part of PHPPowerPoint - A pure PHP library for reading and writing
 * presentations documents.
 *
 * PHPPowerPoint is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPPowerPoint
 * @copyright   2009-2014 PHPPowerPoint contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpPowerpoint\Shape\Table;

use PhpOffice\PhpPowerpoint\IComparable;
use PhpOffice\PhpPowerpoint\Shape\Table\Cell;
use PhpOffice\PhpPowerpoint\Style\Fill;

/**
 * PHPPowerPoint_Shape_Table_Row
 *
 * @category   PHPPowerPoint
 * @package    PHPPowerPoint_Shape
 * @copyright  Copyright (c) 2009 - 2010 PHPPowerPoint (http://www.codeplex.com/PHPPowerPoint)
 */
class Row implements IComparable
{
    /**
     * Cells
     *
     * @var PHPPowerPoint_Shape_Table_Cell[]
     */
    private $_cells;

    /**
     * Fill
     *
     * @var PHPPowerPoint_Style_Fill
     */
    private $_fill;

    /**
     * Height (in pixels)
     *
     * @var int
     */
    private $_height = 38;

    /**
     * Active cell index
     *
     * @var int
     */
    private $_activeCellIndex = -1;

    /**
     * Create a new PHPPowerPoint_Shape_Table_Row instance
     *
     * @param int $columns Number of columns
     */
    public function __construct($columns = 1)
    {
        // Initialise variables
        $this->_cells = array();
        for ($i = 0; $i < $columns; $i++) {
            $this->_cells[] = new Cell();
        }

        // Set fill
        $this->_fill = new Fill();
    }

    /**
     * Get cell
     *
     * @param  int                            $cell            Cell number
     * @param  boolean                        $exceptionAsNull Return a null value instead of an exception?
     * @return PHPPowerPoint_Shape_Table_Cell
     */
    public function getCell($cell = 0, $exceptionAsNull = false)
    {
        if (!isset($this->_cells[$cell])) {
            if ($exceptionAsNull) {
                return null;
            }
            throw new Exception('Cell number out of bounds.');
        }

        return $this->_cells[$cell];
    }

    /**
     * Get cells
     *
     * @return PHPPowerPoint_Shape_Table_Cell[]
     */
    public function getCells()
    {
        return $this->_cells;
    }

    /**
     * Next cell (moves one cell to the right)
     *
     * @return PHPPowerPoint_Shape_Table_Cell
     * @throws Exception
     */
    public function nextCell()
    {
        $this->_activeCellIndex++;
        if (isset($this->_cells[$this->_activeCellIndex])) {
            $this->_cells[$this->_activeCellIndex]->setFill(clone $this->getFill());

            return $this->_cells[$this->_activeCellIndex];
        } else {
            throw new Exception("Cell count out of bounds.");
        }
    }

    /**
     * Get fill
     *
     * @return PHPPowerPoint_Style_Fill
     */
    public function getFill()
    {
        return $this->_fill;
    }

    /**
     * Set fill
     *
     * @param  PHPPowerPoint_Style_Fill      $fill
     * @return PHPPowerPoint_Shape_Table_Row
     */
    public function setFill(Fill $fill)
    {
        $this->_fill = $fill;

        return $this;
    }

    /**
     * Get height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * Set height
     *
     * @param  int                          $value
     * @return PHPPowerPoint_Shape_RichText
     */
    public function setHeight($value = 0)
    {
        $this->_height = $value;

        return $this;
    }

    /**
     * Get hash code
     *
     * @return string Hash code
     */
    public function getHashCode()
    {
        $hashElements = '';
        foreach ($this->_cells as $cell) {
            $hashElements .= $cell->getHashCode();
        }

        return md5($hashElements . $this->_fill->getHashCode() . $this->_height . __CLASS__);
    }

    /**
     * Hash index
     *
     * @var string
     */
    private $_hashIndex;

    /**
     * Get hash index
     *
     * Note that this index may vary during script execution! Only reliable moment is
     * while doing a write of a workbook and when changes are not allowed.
     *
     * @return string Hash index
     */
    public function getHashIndex()
    {
        return $this->_hashIndex;
    }

    /**
     * Set hash index
     *
     * Note that this index may vary during script execution! Only reliable moment is
     * while doing a write of a workbook and when changes are not allowed.
     *
     * @param string $value Hash index
     */
    public function setHashIndex($value)
    {
        $this->_hashIndex = $value;
    }

    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
        $vars = get_object_vars($this);
        foreach ($vars as $key => $value) {
            if ($key == '_parent') {
                continue;
            }

            if (is_object($value)) {
                $this->$key = clone $value;
            } else {
                $this->$key = $value;
            }
        }
    }
}
