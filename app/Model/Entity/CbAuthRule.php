<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 
 * Class CbAuthRule
 *
 * @since 2.0
 *
 * @Entity(table="cb_auth_rule")
 */
class CbAuthRule extends Model
{
    /**
     * 
     * @Id(incrementing=false)
     * @Column()
     *
     * @var int
     */
    private $id;

    /**
     * 
     *
     * @Column()
     *
     * @var string|null
     */
    private $module;

    /**
     * 
     *
     * @Column()
     *
     * @var string|null
     */
    private $page;

    /**
     * 
     *
     * @Column()
     *
     * @var string|null
     */
    private $name;

    /**
     * 
     *
     * @Column()
     *
     * @var string|null
     */
    private $title;


    /**
     * @param int $id
     *
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string|null $module
     *
     * @return void
     */
    public function setModule(?string $module): void
    {
        $this->module = $module;
    }

    /**
     * @param string|null $page
     *
     * @return void
     */
    public function setPage(?string $page): void
    {
        $this->page = $page;
    }

    /**
     * @param string|null $name
     *
     * @return void
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string|null $title
     *
     * @return void
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getModule(): ?string
    {
        return $this->module;
    }

    /**
     * @return string|null
     */
    public function getPage(): ?string
    {
        return $this->page;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

}
