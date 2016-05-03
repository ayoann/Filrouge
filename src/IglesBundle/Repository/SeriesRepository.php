<?php

namespace IglesBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SeriesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SeriesRepository extends EntityRepository
{
	
	public function getSeries()
	{
		$query = $this->_em->createQuery(
    		'SELECT s
    		FROM IglesBundle:Series s
    		WHERE s.moderation = 1
    		ORDER BY s.nomSerie ASC' );
		
		return $query->getResult();
		
	}

	public function getSaisons()
	{
		$query = $this->_em->createQuery(
    		'SELECT s, e
    		FROM IglesBundle:Series s
    		INNER JOIN s.saisons e
    		ORDER BY e.numeroSaisons ASC' );
		
		return $query->getResult();
		
	}

	public function search($like,$limit = 10){

		$query = $this->_em->createQuery(
			'SELECT s
			FROM IglesBundle:Series s
			WHERE s.nomSerie LIKE :like
			ORDER BY s.nomSerie ASC'
			)->setParameter(':like','%'.$like.'%')
			 ->setMaxResults($limit);

		return $query->getResult();
	}

	public function getValidate()
	{
		$query = $this->_em->createQuery(
    		'SELECT s
    		FROM IglesBundle:Series s
    		WHERE s.moderation = 0
    		ORDER BY s.nomSerie ASC' );
		
		return $query->getResult();
		
	}

	public function getSerieLimit($nb=3)
	{
		$query = $this->_em->createQuery(
			'SELECT s
    		FROM IglesBundle:Series s
    		WHERE s.moderation = 1 AND s.id >= 7
    		ORDER BY s.nomSerie DESC 
    		' )->setMaxResults($nb);

		return $query->getResult();
	}

	public function getSeriepop($nb=3)
	{
		$query = $this->_em->createQuery(
			'SELECT s
    		FROM IglesBundle:Series s
    		INNER JOIN s.note n
    		WHERE s.moderation = 1 AND s.note >= 3.0
    		' )->setMaxResults($nb);

		return $query->getResult();
	}

	public function countNotModerer(){
		$query = $this->_em->createQuery(
			'SELECT s
			FROM IglesBundle:Series s
			WHERE s.moderation  = 0
			');
		
		return $query->getResult();
	}
}

