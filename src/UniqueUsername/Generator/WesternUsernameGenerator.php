<?php

namespace UniqueUsername\Generator;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
class WesternUsernameGenerator extends AbstractUsernameGenerator implements UsernameGeneratorInterface
{
    private $reservedNames = array(
        'ALEX' => 'A',
        'ALEXANDER' => 'A',
        'MIKE' => 'M',
        'MICHAEL' => 'A',
        'JON' => 'J',
        'JONATHAN' => 'J',
        'DAVID' => 'D',
        'DAVE' => 'D',
        'TOM' => 'T',
        'THOMAS' => 'T',
        'DOUG' => 'D',
        'DOUGLAS' => 'D',
        'ROB' => 'R',
        'ROBERT' => 'R',
    );

    /**
     * @param string    $fullName
     * @param \DateTime $dateTime
     *
     * @return string
     */
    public function generate($fullName, \DateTime $dateTime)
    {
        if (!$this->isReservedName($fullName)) {
            return '';
        }

        $temp = explode(' ', strtoupper($fullName));
        $temp[0] = $this->reservedNames[$temp[0]];

        return $this->doGenerate(substr(implode('', $temp), 0, 8), $dateTime);
    }

    /**
     * @param string $fullName
     *
     * @return bool
     */
    public function isReservedName($fullName)
    {
        $temp = explode(' ', strtoupper($fullName));
        if (in_array($temp[0], array_keys($this->reservedNames))) {
            return true;
        }

        return false;
    }
}
