aws ecr-public get-login-password --region us-east-1 | docker login --username AWS --password-stdin public.ecr.aws/d7a3o6p2
docker-compose build --no-cache
docker push public.ecr.aws/d7a3o6p2/devskillstest:candidate
