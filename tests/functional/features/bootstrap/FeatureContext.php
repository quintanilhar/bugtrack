<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

class FeatureContext extends MinkContext implements
    Context,
    SnippetAcceptingContext
{
    /**
     * @Given /^(?:|I )am logged in as Reporter$/
     */
    public function iAmLoggedInAsUser()
    {
        $this->visit('/auth/login');

        $this->fillField('email', 'test.reporter@bugtrack.com');
        $this->fillField('password', 'test.reporter');
        $this->pressButton('btn-login');

        $this->assertHomepage();
    }
}
