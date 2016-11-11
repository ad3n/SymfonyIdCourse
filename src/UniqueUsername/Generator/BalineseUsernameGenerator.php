<?php

namespace UniqueUsername\Generator;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
class BalineseUsernameGenerator extends AbstractUsernameGenerator implements UsernameGeneratorInterface
{
    private $reservedNames = array(
        'PUTU' => 'P',
        'WAYAN' => 'W',
        'GUSTI' => 'G',
        'KETUT' => 'K',
        'KOMANG' => 'K',
        'KADEK' => 'K',
        'GEDE' => 'G',
        'IDA' => 'I',
    );

    /**
     * @param string    $fullName
     * @param \DateTime $dateTime
     *
     * @return string
     */
    public function generate($fullName, \DateTime $dateTime)
    {
        if (0 > $index = $this->isReservedName($fullName)) {
            return '';
        }

        $temp = explode(' ', strtoupper($fullName));
        $temp[$index] = $this->reservedNames[$temp[$index]];

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
            return 0;
        }

        if (in_array($temp[1], array_keys($this->reservedNames))) {
            return 1;
        }

        return -1;
    }
}
