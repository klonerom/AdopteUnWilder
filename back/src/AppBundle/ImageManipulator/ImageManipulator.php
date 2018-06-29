<?php
namespace AppBundle\ImageManipulator;


use AppBundle\Entity\User;
use claviska\SimpleImage;

class ImageManipulator
{
    /**
     * @var SimpleImage
     */
    private $simpleImage;

    private $uploadPath;

    public function __construct(SimpleImage $simpleImage, $uploadPath)
    {
        $this->simpleImage = $simpleImage;
        $this->uploadPath = $uploadPath;
    }

    /**
     * Upload and resize of profil picture
     * @param User $user
     */
    public function handleUploadedProfilPicture($picture, $fileNamePicture)
    {
        if (isset($picture)) {
            $this->simpleImage
            ->fromFile($picture->getRealPath())
            ->bestFit(200,200)
            ->toFile($this->uploadPath.$fileNamePicture);
        }
    }
}
