<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\DateTime;

use Symfony\Contracts\Translation\TranslatorInterface;

final class Formatter
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @param Difference $difference
     * @param string     $locale
     *
     * @return string
     */
    public function formatDifference(Difference $difference, $locale = 'en')
    {
        $translationKey = \sprintf('%s.%s', $difference->getUnit()->getName(), $difference->isPast() ? 'past' : 'future');

        return $this->translator->trans(
            $translationKey,
            ['%count%' => $difference->getQuantity()],
            'difference',
            $locale
        );
    }
}
