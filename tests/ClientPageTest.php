<?php


class ClientPageTest extends TestCase
{
    public function test_add_client_button()
    {
		$this->visit('/client')
			->click('Add')
			->seeStatusCode(200)
			->seeJson(['status'=>'success']);
    }
	
    public function test_edit_client_button()
    {
		$this->visit('/client')
			->click('Edit')
			->seeStatusCode(200)
			->seeJson(['status'=>'success']);
    }
	
    public function test_delete_client_button()
    {
		$this->visit('/client')
			->click('Delete')
			->see('Are you sure? You cannot undo once confirmed.');
    }
}
