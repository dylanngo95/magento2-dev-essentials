<?php

namespace Packt\TweetsAbout\Block;

use Abraham\TwitterOAuth\TwitterOAuth;

require $_SERVER['DOCUMENT_ROOT'] . "/app/code/Packt/TweetsAbout/Api/vendor/autoload.php";

class Tweets extends \Magento\Framework\View\Element\Template
{
    const TWITTER_CONSUMER_KEY = 'T9UVgpb48eXJIqqxfibr60daB';
    const TWITTER_CONSUMER_SECRET = '2MtBYm1dnSkHPL5mWOaKzp3ic6kFd5DxzgWPIeDDF3vhCo8glI';
    const TWITTER_ACCESS_TOKEN = '217055845-USlMI0qW4k8PCOgE3VmyuYX3i3l0hvcKRbXkcAYR';
    const TWITTER_ACCESS_TOKEN_SECRET = 'xhniCI6qK2U2TSFM1v7c9fEps0eE8Tk0ZlLQtKSlB7G45';

    private $consumerKey;
    private $consumerSecret;
    private $accessToken;
    private $accessTokenSecret;

    private $tweets;

    /**
     * @return $this
     */
    public function _beforeToHtml()
    {
        $this->init();

        return parent::_beforeToHtml();
    }

    /**
     * @return void
     */
    public function init()
    {
        $this->tweets = $this->searchTweets();
    }

    /**
     * @return object
     */
    public function searchTweets()
    {
        $connection = $this->twitterDevAuth();
        $result = $connection->get("search/tweets", [
            "q" => $this->getData('hashtag'),
            "result_type" => "recent",
            "count" => 10
        ]);

        return $result->statuses;
    }

    /**
     * @return TwitterOAuth
     */
    private function twitterDevAuth()
    {
        return new TwitterOAuth(
            $this->getConsumerKey(),
            $this->getConsumerSecret(),
            $this->getAccessToken(),
            $this->getAccessTokenSecret()
        );
    }

    /**
     * @return string
     */
    public function getConsumerKey()
    {
        if ($this->consumerKey) {
            return $this->consumerKey;
        }

        $this->consumerKey = self::TWITTER_CONSUMER_KEY;

        return $this->consumerKey;
    }

    /**
     * @return string
     */
    public function getConsumerSecret()
    {
        if ($this->consumerSecret) {
           return $this->consumerSecret;
        }

        $this->consumerSecret = self::TWITTER_CONSUMER_SECRET;

        return $this->consumerSecret;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        if ($this->accessToken) {
           return $this->accessToken;
        }

        $this->accessToken = self::TWITTER_ACCESS_TOKEN;

        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getAccessTokenSecret()
    {
        if ($this->accessTokenSecret) {
           return $this->accessTokenSecret;
        }

        $this->accessTokenSecret = self::TWITTER_ACCESS_TOKEN_SECRET;

        return $this->accessTokenSecret;
    }

    /**
     * @return object
     */
    public function getTweets()
    {
        return $this->tweets;
    }

    /**
     * @param object $tweet
     *
     * @return string
     */
    public function getTweetUrl($tweet)
    {
        return isset($tweet->entities->urls[0]->url) ? $tweet->entities->urls[0]->url : '#';
    }
}