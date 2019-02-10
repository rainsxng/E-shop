<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 30.01.2019
 * Time: 8:15
 */

namespace Tests;

use Models\Attribute;
use PHPUnit\Framework\TestCase;

class AttributeModelTest extends TestCase
{
    /**
     * @var Attribute
     */
    private $attribute;
    public function setUp()
    {
        $this->attribute = new Attribute();
        $this->attribute->setId(null);
        $this->attribute->setName("newName");
    }

    public function testAttributeInsert()
    {
        $this->assertEquals(true, $this->attribute->insert($this->attribute));
    }
    public function testUpdateAttribute()
    {
        $this->attribute->setName("newName1");
        $this->assertEquals(true, $this->attribute->update($this->attribute));
    }

    public function testDeleteAttribute()
    {
        $this->assertEquals(true, $this->attribute->delete($this->attribute));
    }
}
