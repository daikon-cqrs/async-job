<?php
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Daikon\AsyncJob\Event;

use Daikon\MessageBus\MessageInterface;

final class JobFailed implements MessageInterface
{
    /** @var MessageInterface */
    private $failedMessage;

    /** @param array $state */
    public static function fromNative($state): MessageInterface
    {
        return new self($state['failed_message']);
    }

    public function toNative(): array
    {
        return $this->failedMessage->toNative();
    }

    private function __construct(MessageInterface $failedMessage)
    {
        $this->failedMessage = $failedMessage;
    }
}
