<?php

namespace IglesBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * EpisodesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EpisodesRepository extends EntityRepository
{
    public function search($like,$limit = 10){

        $query = $this->_em->createQuery(
            'SELECT e
			FROM IglesBundle:Episodes e
			WHERE e.nomEpisode LIKE :like
			ORDER BY e.nomEpisode ASC'
        )->setParameter(':like','%'.$like.'%')
            ->setMaxResults($limit);

        return $query->getResult();


    }
}
