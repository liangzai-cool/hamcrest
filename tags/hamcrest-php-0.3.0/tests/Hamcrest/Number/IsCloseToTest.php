<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Number/IsCloseTo.php';

class Hamcrest_Number_IsCloseToTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    $irrelevant = 0.1;
    return Hamcrest_Number_IsCloseTo::closeTo($irrelevant, $irrelevant);
  }
  
  public function testEvaluatesToTrueIfArgumentIsEqualToADoubleValueWithinSomeError()
  {
    $p = closeTo(1.0, 0.5);
    
    $this->assertTrue($p->matches(1.0));
    $this->assertTrue($p->matches(0.5));
    $this->assertTrue($p->matches(1.5));
    
    $this->assertDoesNotMatch($p, 2.0, 'too large');
    $this->assertMismatchDescription('<2F> differed by <0.5F>', $p, 2.0);
    $this->assertDoesNotMatch($p, 0.0, 'number too small');
    $this->assertMismatchDescription('<0F> differed by <0.5F>', $p, 0.0);
  }
  
}