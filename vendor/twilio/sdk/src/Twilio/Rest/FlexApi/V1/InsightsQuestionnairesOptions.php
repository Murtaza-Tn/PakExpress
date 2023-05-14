<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Flex
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\Options;
use Twilio\Values;

abstract class InsightsQuestionnairesOptions
{
    /**
     * @param string $description The description of this questionnaire
     * @param bool $active The flag to enable or disable questionnaire
     * @param string[] $questionIds The list of questions ids under a questionnaire
     * @param string $token The Token HTTP request header
     * @return CreateInsightsQuestionnairesOptions Options builder
     */
    public static function create(
        
        string $description = Values::NONE,
        bool $active = Values::BOOL_NONE,
        array $questionIds = Values::ARRAY_NONE,
        string $token = Values::NONE

    ): CreateInsightsQuestionnairesOptions
    {
        return new CreateInsightsQuestionnairesOptions(
            $description,
            $active,
            $questionIds,
            $token
        );
    }

    /**
     * @param string $token The Token HTTP request header
     * @return DeleteInsightsQuestionnairesOptions Options builder
     */
    public static function delete(
        
        string $token = Values::NONE

    ): DeleteInsightsQuestionnairesOptions
    {
        return new DeleteInsightsQuestionnairesOptions(
            $token
        );
    }

    /**
     * @param string $token The Token HTTP request header
     * @return FetchInsightsQuestionnairesOptions Options builder
     */
    public static function fetch(
        
        string $token = Values::NONE

    ): FetchInsightsQuestionnairesOptions
    {
        return new FetchInsightsQuestionnairesOptions(
            $token
        );
    }

    /**
     * @param bool $includeInactive Flag indicating whether to include inactive questionnaires or not
     * @param string $token The Token HTTP request header
     * @return ReadInsightsQuestionnairesOptions Options builder
     */
    public static function read(
        
        bool $includeInactive = Values::BOOL_NONE,
        string $token = Values::NONE

    ): ReadInsightsQuestionnairesOptions
    {
        return new ReadInsightsQuestionnairesOptions(
            $includeInactive,
            $token
        );
    }

    /**
     * @param string $name The name of this questionnaire
     * @param string $description The description of this questionnaire
     * @param string[] $questionIds The list of questions ids under a questionnaire
     * @param string $token The Token HTTP request header
     * @return UpdateInsightsQuestionnairesOptions Options builder
     */
    public static function update(
        
        string $name = Values::NONE,
        string $description = Values::NONE,
        array $questionIds = Values::ARRAY_NONE,
        string $token = Values::NONE

    ): UpdateInsightsQuestionnairesOptions
    {
        return new UpdateInsightsQuestionnairesOptions(
            $name,
            $description,
            $questionIds,
            $token
        );
    }

}

class CreateInsightsQuestionnairesOptions extends Options
    {
    /**
     * @param string $description The description of this questionnaire
     * @param bool $active The flag to enable or disable questionnaire
     * @param string[] $questionIds The list of questions ids under a questionnaire
     * @param string $token The Token HTTP request header
     */
    public function __construct(
        
        string $description = Values::NONE,
        bool $active = Values::BOOL_NONE,
        array $questionIds = Values::ARRAY_NONE,
        string $token = Values::NONE

    ) {
        $this->options['description'] = $description;
        $this->options['active'] = $active;
        $this->options['questionIds'] = $questionIds;
        $this->options['token'] = $token;
    }

    /**
     * The description of this questionnaire
     *
     * @param string $description The description of this questionnaire
     * @return $this Fluent Builder
     */
    public function setDescription(string $description): self
    {
        $this->options['description'] = $description;
        return $this;
    }

    /**
     * The flag to enable or disable questionnaire
     *
     * @param bool $active The flag to enable or disable questionnaire
     * @return $this Fluent Builder
     */
    public function setActive(bool $active): self
    {
        $this->options['active'] = $active;
        return $this;
    }

    /**
     * The list of questions ids under a questionnaire
     *
     * @param string[] $questionIds The list of questions ids under a questionnaire
     * @return $this Fluent Builder
     */
    public function setQuestionIds(array $questionIds): self
    {
        $this->options['questionIds'] = $questionIds;
        return $this;
    }

    /**
     * The Token HTTP request header
     *
     * @param string $token The Token HTTP request header
     * @return $this Fluent Builder
     */
    public function setToken(string $token): self
    {
        $this->options['token'] = $token;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.FlexApi.V1.CreateInsightsQuestionnairesOptions ' . $options . ']';
    }
}

class DeleteInsightsQuestionnairesOptions extends Options
    {
    /**
     * @param string $token The Token HTTP request header
     */
    public function __construct(
        
        string $token = Values::NONE

    ) {
        $this->options['token'] = $token;
    }

    /**
     * The Token HTTP request header
     *
     * @param string $token The Token HTTP request header
     * @return $this Fluent Builder
     */
    public function setToken(string $token): self
    {
        $this->options['token'] = $token;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.FlexApi.V1.DeleteInsightsQuestionnairesOptions ' . $options . ']';
    }
}

class FetchInsightsQuestionnairesOptions extends Options
    {
    /**
     * @param string $token The Token HTTP request header
     */
    public function __construct(
        
        string $token = Values::NONE

    ) {
        $this->options['token'] = $token;
    }

    /**
     * The Token HTTP request header
     *
     * @param string $token The Token HTTP request header
     * @return $this Fluent Builder
     */
    public function setToken(string $token): self
    {
        $this->options['token'] = $token;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.FlexApi.V1.FetchInsightsQuestionnairesOptions ' . $options . ']';
    }
}

class ReadInsightsQuestionnairesOptions extends Options
    {
    /**
     * @param bool $includeInactive Flag indicating whether to include inactive questionnaires or not
     * @param string $token The Token HTTP request header
     */
    public function __construct(
        
        bool $includeInactive = Values::BOOL_NONE,
        string $token = Values::NONE

    ) {
        $this->options['includeInactive'] = $includeInactive;
        $this->options['token'] = $token;
    }

    /**
     * Flag indicating whether to include inactive questionnaires or not
     *
     * @param bool $includeInactive Flag indicating whether to include inactive questionnaires or not
     * @return $this Fluent Builder
     */
    public function setIncludeInactive(bool $includeInactive): self
    {
        $this->options['includeInactive'] = $includeInactive;
        return $this;
    }

    /**
     * The Token HTTP request header
     *
     * @param string $token The Token HTTP request header
     * @return $this Fluent Builder
     */
    public function setToken(string $token): self
    {
        $this->options['token'] = $token;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.FlexApi.V1.ReadInsightsQuestionnairesOptions ' . $options . ']';
    }
}

class UpdateInsightsQuestionnairesOptions extends Options
    {
    /**
     * @param string $name The name of this questionnaire
     * @param string $description The description of this questionnaire
     * @param string[] $questionIds The list of questions ids under a questionnaire
     * @param string $token The Token HTTP request header
     */
    public function __construct(
        
        string $name = Values::NONE,
        string $description = Values::NONE,
        array $questionIds = Values::ARRAY_NONE,
        string $token = Values::NONE

    ) {
        $this->options['name'] = $name;
        $this->options['description'] = $description;
        $this->options['questionIds'] = $questionIds;
        $this->options['token'] = $token;
    }

    /**
     * The name of this questionnaire
     *
     * @param string $name The name of this questionnaire
     * @return $this Fluent Builder
     */
    public function setName(string $name): self
    {
        $this->options['name'] = $name;
        return $this;
    }

    /**
     * The description of this questionnaire
     *
     * @param string $description The description of this questionnaire
     * @return $this Fluent Builder
     */
    public function setDescription(string $description): self
    {
        $this->options['description'] = $description;
        return $this;
    }

    /**
     * The list of questions ids under a questionnaire
     *
     * @param string[] $questionIds The list of questions ids under a questionnaire
     * @return $this Fluent Builder
     */
    public function setQuestionIds(array $questionIds): self
    {
        $this->options['questionIds'] = $questionIds;
        return $this;
    }

    /**
     * The Token HTTP request header
     *
     * @param string $token The Token HTTP request header
     * @return $this Fluent Builder
     */
    public function setToken(string $token): self
    {
        $this->options['token'] = $token;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.FlexApi.V1.UpdateInsightsQuestionnairesOptions ' . $options . ']';
    }
}

