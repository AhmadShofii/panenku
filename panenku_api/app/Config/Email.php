<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    /**
     * Email pengirim
     */
    public string $fromEmail  = 'ahmadshofii023@gmail.com';

    public string $fromName   = 'PanenKu';


    /**
     * Recipient default
     */
    public string $recipients = '';


    /**
     * User Agent
     */
    public string $userAgent = 'CodeIgniter';



    /**
     * Mail Protocol
     * mail | sendmail | smtp
     */
    public string $protocol = 'smtp';



    /**
     * SMTP Configuration
     */

    public string $SMTPHost = 'smtp.gmail.com';


    /**
     * Authentication Method
     */
    public string $SMTPAuthMethod = 'login';



    /**
     * Gmail Account
     */
    public string $SMTPUser = 'ahmadshofii023@gmail.com';



    /**
     * Gmail App Password
     *
     * GANTI DENGAN APP PASSWORD GOOGLE
     */
    public string $SMTPPass = 'ytjuxlolbwgabqpe';



    /**
     * SMTP Port Gmail TLS
     */
    public int $SMTPPort = 587;



    /**
     * SMTP Timeout
     */
    public int $SMTPTimeout = 10;



    /**
     * Persistent connection
     */
    public bool $SMTPKeepAlive = false;



    /**
     * Encryption
     */
    public string $SMTPCrypto = 'tls';



    /**
     * Email Format
     */
    public bool $wordWrap = true;


    public int $wrapChars = 76;



    /**
     * Email Type
     */
    public string $mailType = 'html';



    /**
     * Charset
     */
    public string $charset = 'UTF-8';



    /**
     * Validate email
     */
    public bool $validate = true;



    /**
     * Priority
     */
    public int $priority = 3;



    /**
     * Line Break
     */
    public string $CRLF = "\r\n";

    public string $newline = "\r\n";



    /**
     * BCC
     */
    public bool $BCCBatchMode = false;

    public int $BCCBatchSize = 200;



    /**
     * DSN
     */
    public bool $DSN = false;
}