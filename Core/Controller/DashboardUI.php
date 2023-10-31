<?php

namespace FacturaScripts\Core\Controller;

use FacturaScripts\Core\Template\UIController;
use FacturaScripts\Core\UI\Dropdown;
use FacturaScripts\Core\UI\Section;
use FacturaScripts\Core\UI\TabCalendar;
use FacturaScripts\Core\UI\TabCards;
use FacturaScripts\Core\UI\TabCharts;
use FacturaScripts\Core\UI\TabDataTable;
use FacturaScripts\Core\UI\TabForm;
use FacturaScripts\Core\UI\TabFormList;
use FacturaScripts\Core\UI\TabGantt;
use FacturaScripts\Core\UI\TabKanban;
use FacturaScripts\Core\UI\TabList;
use FacturaScripts\Core\UI\TabMap;

class DashboardUI extends UIController
{
    public function privateCore(&$response, $user, $permissions)
    {
        parent::privateCore($response, $user, $permissions);

        // añadimos un par de secciones
        $this->addSection('top', new Section())
            ->setTitle('Top section');

        $this->addSection('bottom')
            ->setTitle('Bottom section');

        $this->addSection('main')
            ->setTitle('Main section')
            ->setPosition(1);

        // añadimos 2 botones a la sección top
        $this->section('top')->addButton('button1')
            ->setIcon('fas fa-plus-square')
            ->setColor('success')
            ->setDescription('Descripción del botón 1');
        $this->section('top')->addButton('button2')
            ->setCounter(5);

        // añadimos un tercer botón y lo ponemos después del botón 1
        $this->section('top')->addButton('button3')
            ->setPosition(1);

        // añadimos un botón a la sección main
        $this->section('main')->addButton('button4');

        // añadimos un dropdown a la sección main, con 2 enlaces, un separador y un tercer enlace
        $this->section('main')->addButton('dropdown1', new Dropdown())
            ->setIcon('fas fa-list')
            ->setColor('info')
            ->setDescription('Descripción del dropdown')
            ->addLink('link1', 'https://www.google.com', 'fas fa-plus-square')
            ->addLink('link2', 'https://www.google.com')
            ->addLink('-', '#')
            ->addLink('link3', 'https://www.google.com');

        // añadimos un botón a la sección bottom
        $this->section('bottom')->addButton('button5');

        // añadimos un tab de formulario a la sección top
        $this->section('top')->addTab('tab1', new TabForm());

        // añadimos 2 pestañas de listado a la sección main
        $this->section('main')->addTab('tab1', new TabList())
            ->setLabel('Listado 1');
        $this->section('main')->addTab('tab2', new TabList())
            ->setLabel('Listado 2');

        // añadimos un tercer tab y lo ponemos después del tab 1
        $this->section('main')->addTab('tab3', new TabForm())
            ->setLabel('Formulario')
            ->setPosition(1);

        // añadimos un tab de listado de formularios
        $this->section('main')->addTab('tab4', new TabFormList())
            ->setLabel('+Formularios');

        // añadimos un tab con un calendario
        $this->section('main')->addTab('tab5', new TabCalendar())
            ->setLabel('Calendario')
            ->setPosition(-1);

        // añadimos un tab con un mapa
        $this->section('bottom')->addTab('tab6', new TabMap())
            ->setLabel('Mapa');

        // añadimos un tab a la sección bottom
        $this->section('bottom')->addTab('tab7', new TabCards())
            ->setLabel('Galería');

        // añadimos una cuarta sección con una pestaña de gráficos
        $this->addSection('charts')
            ->setTitle('Charts section')
            ->addTab('tab1', new TabCharts())
            ->setLabel('Gráficos');

        // añadimos otra sección con un datatable
        $this->addSection('datatable')
            ->setTitle('Datatable section')
            ->addTab('tab1', new TabDataTable())
            ->setLabel('Datatable');

        // añadimos otra sección con un kanban
        $this->addSection('kanban')
            ->setTitle('Kanban section')
            ->addTab('tab1', new TabKanban())
            ->setLabel('Kanban');

        // añadimos una sección con un diagrama de gantt
        $this->addSection('gantt')
            ->setTitle('Gantt section')
            ->addTab('tab1', new TabGantt())
            ->setLabel('Gantt');
    }
}