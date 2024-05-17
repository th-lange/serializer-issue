<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Example;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;


#[Route('/test1')]
final class FirstController extends AbstractController
{
    public function __construct(
        private NormalizerInterface $normalizer,
        private SerializerInterface $serializer,
    )
    {
    }


    #[Route('/')]
    public function first(Request $request): Response
    {
        $example = new Example();
        $example->setContent('content')
            ->setAuthor('Author')
            ->setExampleName('Example 1')
            ->setText('Some Text');

        $noGroup = $this->normalizer->normalize($example, null, []);
        $example = $this->normalizer->normalize($example, null, [AbstractNormalizer::GROUPS => ['one']]);
        $example2 = $this->normalizer->normalize($example, null, [AbstractNormalizer::GROUPS => ['two']]);
        $example3 = $this->normalizer->normalize($example, null, [AbstractNormalizer::GROUPS => ['id']]);

        return new JsonResponse(
            [
                'noGroup' => $noGroup,
                'example' => $example,
                'example2' => $example2,
                'id' => $example3,
            ]
        );
    }
}
