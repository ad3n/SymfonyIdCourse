<?php

namespace UniqueUsername\Generator;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
class IslamicUsernameGenerator extends AbstractUsernameGenerator implements UsernameGeneratorInterface
{
    private $reservedNames = array(
        'MUHAMMAD' => 'M',
        'MUHAMAD' => 'M',
        'MOHAMMAD' => 'M',
        'MOHAMAD' => 'M',
        'MUCHAMMAD' => 'M',
        'MUCHAMAD' => 'M',
        'MOCHAMMAD' => 'M',
        'MOCHAMAD' => 'M',
        'MUHAMMAT' => 'M',
        'MUHAMAT' => 'M',
        'MOHAMMAT' => 'M',
        'MOHAMAT' => 'M',
        'MUCHAMMAT' => 'M',
        'MUCHAMAT' => 'M',
        'MOCHAMMAT' => 'M',
        'MOCHAMAT' => 'M',
        'MOH' => 'M',
        'MOCH' => 'M',
        'AHMAD' => 'A',
        'ACHMAD' => 'A',
        'AHMAT' => 'A',
        'ACHMAT' => 'A',
        'SITI' => 'S',
        'NUR' => 'N',
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
