<?php

namespace Qck\Mail;

/**
 * Description of PhpMailer
 *
 * @author muellerm
 */
class PartyFactory implements \Qck\Mail\Interfaces\PartyFactory
{

  public function create( $Name, $MailAddress )
  {
    return new Party( $Name, $MailAddress );
  }
}
