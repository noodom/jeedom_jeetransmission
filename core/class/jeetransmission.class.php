<?php

/* This file is part of Jeedom.
*
* Jeedom is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Jeedom is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
*/

/* * ***************************Includes********************************* */
require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';
if (!class_exists('Transmission')) {
	require_once dirname(__FILE__) . '/../../3rdparty/TransmissionRPC.class.php';
}

class jeetransmission extends eqLogic {

	public function postUpdate() {
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'inprogress');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande inprogress');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Téléchargements en cours', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('inprogress');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('numeric');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'finish');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande finish');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Torrents terminés', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('finish');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('numeric');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'pause');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande pause');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Torrents en pause', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('pause');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('numeric');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'list');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande list');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Liste des torrents', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('list');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('string');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'download');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande download');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Vitesse de download', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('download');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('numeric');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'upload');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande upload');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Vitesse de upload', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('upload');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('numeric');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'remove');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande remove');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Enlever un torrent', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('remove');
			$jeetransmissionCmd->setType('action');
			$jeetransmissionCmd->setSubType('message');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'purge');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande purge');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Purger un torrent', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('purge');
			$jeetransmissionCmd->setType('action');
			$jeetransmissionCmd->setSubType('message');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'query');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande query');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Interroger Transmission', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('query');
			$jeetransmissionCmd->setType('action');
			$jeetransmissionCmd->setSubType('message');
			$jeetransmissionCmd->save();
		}

	}

	public function cronHourly() {
		log::add('jeetransmission', 'debug', 'etat hourly');
		foreach (eqLogic::byType('jeetransmission', true) as $jeetransmission) {
			$jeetransmission->btStatus();
		}
	}

	public function btStatus() {
		$transmission = new TransmissionRPC($this->getConfiguration('url'), $this->getConfiguration('user'), $this->getConfiguration('password'));
		$transmission->return_as_array = true;
		$torrent  = $transmission->sstats(); // inprogress, finish, pause, upload, download
		$download = (array_key_exists('torrentCount',$torrent['arguments'])) ? $torrent['arguments']['torrentCount'] : '0';
		$pause = (array_key_exists('pausedTorrentCount',$torrent['arguments'])) ? $torrent['arguments']['pausedTorrentCount'] : '0';
		$finish = (array_key_exists('activeTorrentCount',$torrent['arguments'])) ? $download - $pause - $torrent['arguments']['activeTorrentCount'] : '0';
		$download = (array_key_exists('downloadSpeed',$torrent['arguments'])) ? $torrent['arguments']['downloadSpeed'] : '0';
		$upload = (array_key_exists('uploadSpeed',$torrent['arguments'])) ? $torrent['arguments']['uploadSpeed'] : '0';

		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'inprogress');
			$jeetransmissionCmd->setConfiguration('value',$download);
			$jeetransmissionCmd->save();
			$jeetransmissionCmd->event($download);
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'pause');
			$jeetransmissionCmd->setConfiguration('value',$pause);
			$jeetransmissionCmd->save();
			$jeetransmissionCmd->event($pause);
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'finish');
			$jeetransmissionCmd->setConfiguration('value',$finish);
			$jeetransmissionCmd->save();
			$jeetransmissionCmd->event($finish);
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'upload');
			$jeetransmissionCmd->setConfiguration('value',$upload);
			$jeetransmissionCmd->save();
			$jeetransmissionCmd->event($upload);
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'download');
			$jeetransmissionCmd->setConfiguration('value',$download);
			$jeetransmissionCmd->save();
			$jeetransmissionCmd->event($download);

		log::add('jeetransmission', 'debug', print_r($torrent));
		log::add('jeetransmission', 'debug', $torrent['arguments']['uploadSpeed']);

		$torrent  = $transmission->get(); //list
		$list = '{';
		foreach ($torrent['arguments']['torrents'] as $value) {
			$list .= '{"id":' . $value['id'] . ',"name":' . $value['name'] . ',"status":' . $value['status'] . '}';
		}
		$list .= '}';
		log::add('jeetransmission', 'debug', print_r($torrent));
		log::add('jeetransmission', 'debug', $list);
	}
}

class jeetransmissionCmd extends cmd {
	public function preSave() {
		if ($this->getSubtype() == 'message') {
			$this->setDisplay('message_disable', 1);
		}
	}

	public function execute($_options = null) {
		switch ($this->getType()) {
			case 'info' :
			return $this->getConfiguration('value');
			break;

			case 'action' :
			$eqLogic = $this->getEqLogic();

			if ($this->getLogicalId() == 'query') {
				$eqLogic->btStatus();
			} else if ($this->getLogicalId() == 'remove') { // remove
				if (is_numeric(trim($_options['title']))) {
					$transmission = new TransmissionRPC($eqLogic->getConfiguration('url'), $eqLogic->getConfiguration('user'), $eqLogic->getConfiguration('password'));
					$torrent  = $transmission->remove(trim($_options['title']));
				}
			} else if ($this->getLogicalId() == 'purge') { // remove
				if (is_numeric(trim($_options['title']))) {
					$transmission = new TransmissionRPC($eqLogic->getConfiguration('url'), $eqLogic->getConfiguration('user'), $eqLogic->getConfiguration('password'));
					$torrent  = $transmission->remove(trim($_options['title']), true);
				}
			}
			return true;
			break;
		}
	}

}

?>
