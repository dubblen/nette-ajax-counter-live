<?php

namespace App\Presenters;

use Nette;
use Nette\Http\Session;

class HomepagePresenter extends Nette\Application\UI\Presenter
{
	private $session;
	private $section;

	public function __construct(Session $session)
	{
		$this->session = $session;
		$this->section = $this->session->getSection('counter');
		if (!is_int($this->section->counter)) {
			$this->section->counter = 0;
		}
	}

	public function renderDefault() {


		$this->template->counter = $this->section->counter;
	}

	public function handleCounterClick() {
		$this->section->counter++;

		if ($this->section->counter == 20) {
			$this->flashMessage('Hezky vole.');
			$this->redrawControl('flash');
		}

		$this->redrawControl('counter');
	}
}
