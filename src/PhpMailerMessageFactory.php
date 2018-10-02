<?php

namespace Qck\Mail;

/**
 * Description of PhpMailer
 *
 * @author muellerm
 */
class PhpMailerMessageFactory implements \Qck\Mail\Interfaces\MessageFactory
{

  function __construct( \Qck\Mail\Interfaces\SmtpSource $SmtpSource )
  {
    $this->SmtpSource = $SmtpSource;
  }

  public function create( array $Recipients, $Text )
  {
    $Message = new PhpMailerMessage( $this->SmtpSource->get(), $Recipients, $Text );
    return $Message;
  }

  /**
   *
   * @var \Qck\Mail\Interfaces\SmtpSource
   */
  protected $SmtpSource;

}
