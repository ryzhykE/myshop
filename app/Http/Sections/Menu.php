<?php

namespace App\Http\Sections;


use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminColumnEditable;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
/**
 * Class Menu
 *
 * @property \App\Models\Menu $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Menu extends Section
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;
    /**
     * @var string
     */
    protected $title = 'Menu';
    /**
     * @var string
     */
    protected $alias;
    /**
     * @return DisplayInterface
     */

    public function onDisplay()
    {
        $display = AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary');
        $display->setColumns(
            AdminColumn::text('id','ID'),
            AdminColumn::text('name','Название'),
            AdminColumn::link('url', 'Ссылка')->setWidth('100px'),
            AdminColumn::text('position', 'Позиция')->setWidth('50px'),
            AdminColumn::text('parent','Главное меню')->setWidth('100px')

        );
        return $display;
    }
    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody(
            [
                AdminFormElement::text('name','Название')->required(),
                AdminFormElement::text('url','Ссылка')->required(),
                AdminFormElement::number('position','Позиция')->required(),
                AdminFormElement::select('parent', 'Parent', \App\Models\Menu::class)->setDisplay('name')->nullable()
            ]
        );
    }
    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }
    /**
     * @return void
     */
    public function onDelete($id)
    {
        // todo: remove if unused
    }
    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }
}