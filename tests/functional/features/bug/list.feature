Feature: List of bugs
    In order to see the list of bugs
    As a user
    I need a page to see the list

    Background:
        Given I am logged in as Reporter

    Scenario: Open container as default
        Given I am on "/bugs"
        Then I should see "Bugs" in the "title" element
        And I should see "Open" as active container

    Scenario: List closed bugs
        Given I am on "/bugs"
        And I follow "Closed"
        Then I should see "Bugs" in the "title" element
        And I should see "Closed" as active container

    Scenario: List all bugs
        Given I am on "/bugs"
        And I follow "All"
        Then I should see "Bugs" in the "title" element
        And I should see "All" as active container

    Scenario: Filter by Reporter
        Given I am on "/bugs"
        And I filter by "Reporter" "Test Reporter" 
        Then I should see "Reporter: Test Reporter" in the Using Filters Container
