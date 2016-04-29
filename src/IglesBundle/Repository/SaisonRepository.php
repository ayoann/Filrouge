<?php

namespace IglesBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SaisonRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SaisonRepository extends EntityRepository
{
	public function getEpisodes()
	{
		$query = $this->_em->createQuery(
    		'SELECT s, e
    		FROM IglesBundle:Saison s
    		INNER JOIN s.episodes e
    		ORDER BY e.numeroEpisode ASC' );
		
		return $query->getResult();
		
	}

	public function getSaisons()
	{
		$query = $this->_em->createQuery(
    		'SELECT s, e
    		FROM IglesBundle:Saison s
    		INNER JOIN s.serie e
    		ORDER BY s.numeroSaisons ASC' );
		
		return $query->getResult();
		
	}

	public function getSeries($serieid){
		$query = $this->_em->createQyery(
			'SELECT s, e
			FROM IglesBundle:Series s
			INNER JOIN s.saison e
			WHERE s.id = :id'
		)->setParameter('id', $serieid);

		return $query->getResult();
	}
}

