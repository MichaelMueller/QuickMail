<?php

/* @var $ServiceRepo Qck\ServiceRepo */
$ServiceRepo = Qck\ServiceRepo::getInstance();

// add service
$ServiceRepo->addServiceFactory( \Qck\Mail\PhpMailerMessageFactory::class, function() use($ServiceRepo)
{
  $SmtpSource = $ServiceRepo->getOptional( Qck\Mail\Interfaces\SmtpSource::class );
  return $SmtpSource ? new \Qck\Mail\PhpMailerMessageFactory( $SmtpSource ) : null;
} );

// add service
$ServiceRepo->addServiceFactory( \Qck\Mail\PartyFactory::class, function()
{
  return new \Qck\Mail\PartyFactory();
} );

// add service
$ServiceRepo->addServiceFactory( \Qck\Mail\AdminMailer::class, function() use($ServiceRepo)
{
  $MessageFactory = $ServiceRepo->getOptional( Qck\Mail\Interfaces\MessageFactory::class );
  $AdminPartySource = $ServiceRepo->getOptional( Qck\Mail\Interfaces\AdminPartySource::class );
  return ($MessageFactory && $AdminPartySource) ? new \Qck\Mail\AdminMailer( $MessageFactory, $AdminPartySource ) : null;
} );
