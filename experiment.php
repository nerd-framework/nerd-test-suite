<?php

$cloak = new \Nerd\Framework\TestSuite\Browser(null);

$cloak->get('/')->expectStatusCode(200);
