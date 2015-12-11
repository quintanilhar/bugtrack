<?php

class BugContext extends FeatureContext
{
    const CONTAINERS = '.containers';
    const FILTER_CONTAINER = '.filter-container';

    /**
     * @Then I should see :container as active container
     */
    public function iShouldSeeAsActiveContainer($container)
    {
        $containers = $this->getSession()
            ->getPage()
            ->find('css', self::CONTAINERS);

        $activeTextContainer = $containers->find('css', '.active')
            ->getText();

        PHPUnit_Framework_Assert::assertContains(
            $container, 
            $activeTextContainer
        );
    }

    /**
     * @Given I filter by :filter :value
     */
    public function iFilterBy($filter, $value)
    {
    }

    /**
     * @Then I should see :text in the Using Filters Container
     */
    public function iShouldSeeInTheUsingFiltersContainer($text)
    {
        $filtersSection = $this->getSession()
            ->getPage()
            ->find('css', self::FILTER_CONTAINER);

        $usingFilters = $filtersSection->find('css', '.filtered-text')
            ->getText();

        PHPUnit_Framework_Assert::assertContains(
            $text, 
            $usingFilters
        );
    }
}
