<?php


namespace TelegramBotsApi\Types;

/**
 * Instance of this class represents a sticker set.
 * @package TelegramBotsApi\Types
 * @author Maxim Kuvardin <kuvard.in@mail.ru>
 */
class StickerSet implements TypeInterface
{
    /**
     * @var string Sticker set name
     */
    public $name;

    /**
     * @var string Sticker set title
     */
    public $title;

    /**
     * @var bool True, if the sticker set contains masks
     */
    public $contains_masks;

    /**
     * @var Sticker[] List of all set stickers
     */
    public $stickers;

    /**
     * StickerSet constructor.
     * @param array $data
     * @throws \Exception
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->title = $data['title'];
        $this->contains_masks = $data['contains_masks'];
        $this->stickers = [];
        foreach ($data['stickers'] as $sticker) {
            $this->stickers[] = $sticker instanceof Sticker ? $sticker : new Sticker($sticker);
        }
    }

    /**
     * @return array
     */
    public function getRequestArray(): array
    {
        // TODO: Implement getRequestArray() method.
        return [
            'name' => $this->name,
            'title' => $this->title,
            'contains_masks' => $this->contains_masks,
            'stickers' => $this->stickers,
        ];
    }

    /**
     * @param string $name
     * @param string $title
     * @param bool $contains_masks
     * @param array $stickers
     * @return StickerSet
     * @throws \Exception
     */
    public static function make(string $name, string $title, bool $contains_masks, array $stickers): self
    {
        return new self([
            'name' => $name,
            'title' => $title,
            'contains_masks' => $contains_masks,
            'stickers' => $stickers,
        ]);
    }
}