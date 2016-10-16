<?php

$cloak = new \Nerd\Framework\TestSuite\Runner(null);

$cloak->get('/')->expectStatusCode(200);
