<?php

$cloak = new \Nerd\Framework\TestSuite\Navigator(null);

$cloak->get('/')->expectStatusCode(200);
