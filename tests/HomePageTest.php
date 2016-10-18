<?php


class HomePageTest extends TestCase
{
    public function test_home_page_says_welcome()
    {
        $this->visit('/')
			->see('Welcome to the HomePage!');
    }
	
	public function test_client_link()
	{
		$this->visit('/')
			->click('Clients')
			->seePageIs('/client');
	}
}
