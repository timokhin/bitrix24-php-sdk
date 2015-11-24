<?php
namespace Bitrix24\Calendar;

use Bitrix24\Bitrix24Entity;
use Bitrix24\Bitrix24Exception;

/**
 * Class Accessibility
 * @package Bitrix24\Accessibility
 */
class Calendar extends Bitrix24Entity
{

    const EVENT_TYPE_GROUP = 'group';
    const EVENT_TYPE_USER = 'user';

    public function eventAdd($arParams)
    {
        $fullResult = $this->client->call('calendar.event.add', $arParams);
        return $fullResult;
    }

    public function eventGet($ownerId, $from = null, $to = null, $type = self::EVENT_TYPE_USER)
    {
        $params = array(
            "ownerId" => $ownerId,
            "type" => $type,
        );

        if (!is_null($from)) {
            $params['from'] = $from;
        }

        if (!is_null($to)) {
            $params['to'] = $to;
        }

        $fullResult = $this->client->call('calendar.event.get', $params);
        return $fullResult;
    }

    public function eventDelete($ownerId, $eventId, $type = self::EVENT_TYPE_USER)
    {
        $fullResult = $this->client->call('calendar.event.delete', array(
            "ownerId" => $ownerId,
            "id" => $eventId,
            "type" => $type,
        ));
        return $fullResult;
    }

    public function sectionGet($ownerId, $type = self::EVENT_TYPE_USER)
    {
        $fullResult = $this->client->call('calendar.section.get', array(
            "ownerId" => $ownerId,
            "type" => $type,
        ));
        return $fullResult;
    }

}