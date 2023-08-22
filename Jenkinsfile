pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Increment Version and Commit') {
            steps {
                script {
                    def versionFile = 'version.txt'
                    def currentVersion = readFile(versionFile).trim()
                    def newVersion = currentVersion.split('\\.').collect { it.toInteger() }
                    newVersion[2]++
                    newVersion = newVersion.join('.')
                    writeFile file: versionFile, text: newVersion

                    sh "git config --global user.email 'jenkins@example.com'"
                    sh "git config --global user.name 'Jenkins CI'"
                    sh "git add ${versionFile}"
                    sh "git commit -m 'Increment version to ${newVersion}'"
                }
            }
        }

        
    }

    post {
        always {
            // Clean up after the pipeline finishes
            deleteDir()
        }
    }
}
