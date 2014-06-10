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

namespace PhpOffice\PhpPowerpoint\Shape\Chart;

use PhpOffice\PhpPowerpoint\IComparable;

/**
 * PHPPowerPoint_Shape_Chart_View3D
 *
 * @category   PHPPowerPoint
 * @package    PHPPowerPoint_Shape_Chart
 * @copyright  Copyright (c) 2009 - 2010 PHPPowerPoint (http://www.codeplex.com/PHPPowerPoint)
 */
class View3D implements IComparable
{
    /**
     * Rotation X
     *
     * @var int
     */
    protected $_rotationX = 0;

    /**
     * Rotation Y
     *
     * @var int
     */
    protected $_rotationY = 0;

    /**
     * Right Angle Axes
     *
     * @var boolean
     */
    private $_rightAngleAxes = true;

    /**
     * Perspective
     *
     * @var int
     */
    private $_perspective = 30;

    /**
     * Height Percent
     *
     * @var int
     */
    private $_heightPercent = 100;

    /**
     * Depth Percent
     *
     * @var int
     */
    private $_depthPercent = 100;

    /**
     * Create a new PHPPowerPoint_Shape_Chart_View3D instance
     */
    public function __construct()
    {
    }

    /**
     * Get Rotation X
     *
     * @return int
     */
    public function getRotationX()
    {
        return $this->_rotationX;
    }

    /**
     * Set Rotation X (-90 to 90)
     *
     * @param  int                              $pValue
     * @return PHPPowerPoint_Shape_Chart_View3D
     */
    public function setRotationX($pValue = 0)
    {
        $this->_rotationX = $pValue;

        return $this;
    }

    /**
     * Get Rotation Y
     *
     * @return int
     */
    public function getRotationY()
    {
        return $this->_rotationY;
    }

    /**
     * Set Rotation Y (-90 to 90)
     *
     * @param  int                              $pValue
     * @return PHPPowerPoint_Shape_Chart_View3D
     */
    public function setRotationY($pValue = 0)
    {
        $this->_rotationY = $pValue;

        return $this;
    }

    /**
     * Get RightAngleAxes
     *
     * @return boolean
     */
    public function getRightAngleAxes()
    {
        return $this->_rightAngleAxes;
    }

    /**
     * Set RightAngleAxes
     *
     * @param  boolean                          $value
     * @return PHPPowerPoint_Shape_Chart_View3D
     */
    public function setRightAngleAxes($value = true)
    {
        $this->_rightAngleAxes = $value;

        return $this;
    }

    /**
     * Get Perspective
     *
     * @return int
     */
    public function getPerspective()
    {
        return $this->_perspective;
    }

    /**
     * Set Perspective (0 to 100)
     *
     * @param  int                              $value
     * @return PHPPowerPoint_Shape_Chart_View3D
     */
    public function setPerspective($value = 30)
    {
        $this->_perspective = $value;

        return $this;
    }

    /**
     * Get HeightPercent
     *
     * @return int
     */
    public function getHeightPercent()
    {
        return $this->_heightPercent;
    }

    /**
     * Set HeightPercent (5 to 500)
     *
     * @param  int  $value
     * @return TODO
     */
    public function setHeightPercent($value = 100)
    {
        $this->_heightPercent = $value;

        return $this;
    }

    /**
     * Get DepthPercent
     *
     * @return int
     */
    public function getDepthPercent()
    {
        return $this->_depthPercent;
    }

    /**
     * Set DepthPercent (20 to 2000)
     *
     * @param  int  $value
     * @return TODO
     */
    public function setDepthPercent($value = 100)
    {
        $this->_depthPercent = $value;

        return $this;
    }

    /**
     * Get hash code
     *
     * @return string Hash code
     */
    public function getHashCode()
    {
        return md5($this->_rotationX . $this->_rotationY . ($this->_rightAngleAxes ? 't' : 'f') . $this->_perspective . $this->_heightPercent . $this->_depthPercent . __CLASS__);
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
            if (is_object($value)) {
                $this->$key = clone $value;
            } else {
                $this->$key = $value;
            }
        }
    }
}
