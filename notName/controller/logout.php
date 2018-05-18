<?php

session_start();
session_destroy();
header("Location: ./../painel/index.html");
die();

